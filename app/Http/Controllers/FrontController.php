<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;
use \App\Models\ProductCategories;
use \App\Models\CartItem;

use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $credential = Auth::user();
        $cart = ($credential != null) ? $credential->user->cart : null;

        $products = Product::latest()->take(10)->get();
        $categories = ProductCategories::all();
        if($credential){
            foreach($products as $product){
                foreach($credential->user->cart->items as $item){
                    if($item->product_id == $product->id){
                        $product->isAddedToCart = true;
                    }
                }
            }
        }
        return view('public.home')->with(array(
            'categories' => $categories,
            'products' => $products,
            'cart' => $cart
        ));
    }

    public function quickAddToCart(Request $request, Product $product){
        $credential = Auth::user();
        if (null !== $credential && null !== $product){
            $cart = $credential->user->cart;
            $existed = false;

            foreach($cart->items as $cartItem){
                if($cartItem->product->id == $product->id){
                    $cartItem->delete();
                    $existed = true;
                }
            }
            if($existed){
                return response()->json([
                    'success' => true,
                    'action' => 'delete'
                ]);
            }else{
                $item = CartItem::create([
                    'shopping_session_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => 1,
                ]);
                return response()->json([
                    'success' => true,
                    'action' => 'create'
                ]);
            }
        }else{
            return response()->json([
                'success' => true,
                'action' => 'redirect'
            ]);
        }
    }
    public function addToCart(Request $request, Product $product){
        $credential = Auth::user();
        $quantity = $request->input('quantity', 2);

        if (null !== $credential && null !== $product){
            $cart = $credential->user->cart;
            $existed = false;

            foreach($cart->items as $cartItem){
                if($cartItem->product->id == $product->id){
                    $cartItem->quantity = $quantity;
                    $cartItem->save();
                    $existed = true;
                }
            }
            if($existed){
                return response()->json([
                    'success' => true,
                    'action' => 'updated'
                ]);
            }else{
                $item = CartItem::create([
                    'shopping_session_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                ]);
                return response()->json([
                    'success' => true,
                    'action' => 'create'
                ]);
            }
        }else{
            return response()->json([
                'success' => true,
                'action' => 'redirect'
            ]);
        }
    }

    public function updateMinicart(Request $request){
        $credential = Auth::user();

        if (null !== $credential){
            $cart = $credential->user->cart;
            $str = '';
            foreach($cart->items as $cartItem){
                $str .= '
                <li class="single-product-cart" data-product-id="'.$cartItem->product->id.'">
                    <div class="cart-img">
                        <a href="#">
                            <img class="minicart-img" src="'.asset('storage/'.$cartItem->product->gallery()->where('featured', '=', 1)->get()[0]->url).'" alt="">
                        </a>
                    </div>
                    <div class="cart-title">
                        <h5><a href="#">'.$cartItem->product->name.'</a></h5>
                        <!-- <h6><a href="#">'.$cartItem->product->category->name.'</a></h6> -->
                        <span>$'.$cartItem->product->price.' x '.$cartItem->quantity.'</span>
                    </div>
                    <div class="cart-delete">
                        <a href="javascript://" onclick="deleteMiniCartItem('.$cartItem->id.')"><i class="ti-trash"></i></a>
                    </div>
                </li>';
            }                    
        }
        $str .= '
            <li class="cart-space">
                <div class="cart-sub">
                    <h4>Subtotal</h4>
                </div>
                <div class="cart-price">
                    <h4>$'.$cart->total.'</h4>
                </div>
            </li>
            <li class="cart-btn-wrapper">
                <a class="cart-btn btn-hover" href="#">view cart</a>
                <a class="cart-btn btn-hover" href="#">checkout</a>
            </li>
        ';

        return response()->json([
            'success' => true,
            'html' => $str,
            'count' => count($cart->items)
        ]);
    }

    public function deleteMiniCartItem(CartItem $item, Request $request){
        $credential = Auth::user();
        if($credential){
            $cart = $credential->user->cart;
            foreach($cart->items as $cartItem){
                if($cartItem->id == $item->id){
                    $product_id = $item->product->id;
                    
                    $item->delete();

                    return response()->json([
                        'success' => true,
                        'product_id' => $product_id
                    ]);
                }
            }
        }

        return response()->json([
            'success' => false
        ]);
    }

    public function shop(Request $request){
        $credential = Auth::user();
        $cart = ($credential != null) ? $credential->user->cart : null;

        $filter_min = $request->query('min');
        $filter_max = $request->query('max');
        $filter_name = $request->query('name');
        $sort = $request->query('order', 'default');
        $tab_style = $request->query('tab_style', '#grid-sidebar1');

        $filters = [];
        if($filter_name){
            array_push($filters, ['name', 'like', '%'.$filter_name.'%']);
        }
        if($filter_min){
            array_push($filters, ['price', '>', $filter_min]);
        }
        if($filter_max){
            array_push($filters, ['price', '<', $filter_max]);
        }        
        
        $products = Product::where($filters);
        
        if($sort != 'default'){
            $products->orderby('name', $sort);
        }

        $products = $products->paginate();

        if($credential){
            foreach($products as $product){
                foreach($credential->user->cart->items as $item){
                    if($item->product_id == $product->id){
                        $product->isAddedToCart = true;
                    }
                }
            }
        }

        $categories = ProductCategories::all(); 
        $totalProducts = Product::count();
        
        return view('public.shop')->with(array(
            'categories' => $categories,
            'cart' => $cart,
            'products' => $products,
            'total_products' => $totalProducts,
            'sidebar_active' => 'all',
            'filter_min' => $filter_min,
            'filter_max' => $filter_max,
            'filter_name' => $filter_name,
            'sort' => $sort,
            'tab_style' => $tab_style
        ));  
    }

    public function shopCategory($slug, Request $request){   
        $credential = Auth::user();
        $cart = ($credential != null) ? $credential->user->cart : null;

        $filter_min = $request->query('min');
        $filter_max = $request->query('max');
        $filter_name = $request->query('name');
        $sort = $request->query('order', 'default');
        $tab_style = $request->query('tab_style', '#grid-sidebar1');

        $filters = [];
        if($filter_name){
            array_push($filters, ['name', 'like', '%'.$filter_name.'%']);
        }
        if($filter_min){
            array_push($filters, ['price', '>', $filter_min]);
        }
        if($filter_max){
            array_push($filters, ['price', '<', $filter_max]);
        }       

        $selectedCategory = ProductCategories::where('slug', '=', $slug)->get();
        if(count($selectedCategory)){
            $selectedCategory = $selectedCategory[0];
            $categories = ProductCategories::all();
            array_push($filters, ['category_id', '=', $selectedCategory->id]);
            
            $products = Product::where($filters);

            if($sort != 'default'){
                $products->orderby('name', $sort);
            }

            $products = $products->paginate();

            if($credential){
                foreach($products as $product){
                    foreach($credential->user->cart->items as $item){
                        if($item->product_id == $product->id){
                            $product->isAddedToCart = true;
                        }
                    }
                }
            }

            $totalProducts = Product::all()->count();

            return view('public.shop')->with(array(
                'categories' => $categories,
                'cart' => $cart,
                'products' => $products,
                'total_products' => $totalProducts,
                'sidebar_active' => $selectedCategory->slug,
                'subheader_banner' => $selectedCategory->banner,
                'filter_min' => $filter_min,
                'filter_max' => $filter_max,
                'filter_name' => $filter_name,
                'sort' => $sort,
                'tab_style' => $tab_style
            ));   
        }
    }

    public function quickView(Product $product, Request $request){
            $credential = Auth::user();
            $productInCart = false;
            $productQty = 1;

            if (null !== $credential && null !== $product){
                $cart = $credential->user->cart;

                foreach($cart->items as $cartItem){
                    if($cartItem->product->id == $product->id){
                        $productInCart = true;
                        $productQty = $cartItem->quantity;
                    }
                }
            }
            
            $tabpanel = '';
            $tablist = '';

            $gallery = $product->gallery;
            foreach($gallery as $index => $img){
                $tabpanel .= '<div class="tab-pane ' . (($index == 0) ? 'active show' : '') . ' fade" id="modal'.$index.'" role="tabpanel">
                    <img src="'. asset('storage/'.$img->url) .'" alt="">
                </div>';
                $tablist .= '<a class="' . (($index == 0) ? 'active' : '') . '" href="#modal'.$index.'" role="tab">
                    <img src="'.asset('storage/'.$img->url).'" alt="">
                </a>';

            }
            $res = [
                'success' => true,
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'description' => $product->description,
                'category' => $product->category->name,
                'category_slug' => $product->category->slug,
                'gallery' => $product->gallery,
                'tabpanel' => $tabpanel,
                'tablist' => $tablist,
                'product_in_cart' => $productInCart,
                'product_quantity' => $productQty

            ];

            return response()->json($res);
    }
}
