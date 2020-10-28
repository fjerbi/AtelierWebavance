<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Str;
use Auth;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()){
            return redirect()->route('products.index')
            ->with('warning','You are not logged in');
    }else{

        $categories=Category::all();
        return view('products.create', compact('categories'));
    }
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',

        ]);
     

        $product= new Product();
       $product->user_id= Auth::id();
$product->name=$request->name;
$product->description=$request->description;

$product->save();

        $product->categories()->attach($request->category);
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'categories' => 'required',

        ]);
       
        $product->update($request->all());
       
        $product->categories()->sync($request->categories);
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
    public function details($name)
    {
        $product = Product::where('name',$name)->first();



        return view('products.product',compact('product'));

    }

    public function productByCategory($name)
    {
        $category = Category::where('name',$name)->first();
        $products = $category->products()->get();
        return view('category',compact('category','products'));
    }

 
}
