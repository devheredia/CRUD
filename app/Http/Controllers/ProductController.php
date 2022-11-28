<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\Request;
  
class ProductController extends Controller
{
      /**
     * Exibir uma listagem do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
      
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
  /**
  * Armazene um recurso recém-criado no armazenamento.
  *
  * @param \Illuminate\Http\Request $request
  * @return \Illuminate\Http\Response
  */
    public function create()
    {
        return view('products.create');
    }
  
      /**
      * Exibe o recurso especificado.
      *
      * @param \App\Models\Produto $produto
      * @return \Illuminate\Http\Response
      */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'status'=> 'required',
            'local'=> 'required',
            'date'=> 'required',
        ]);
      
        Product::create($request->all());
       
        return redirect()->route('products.index')
                        ->with('Sucesso','Evento criado');
    }
  
      /**
      * Mostrar o formulário para editar o recurso especificado.
      *
      * @param \App\Models\Produto $produto
      * @return \Illuminate\Http\Response
      */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
   /**
   * Atualize o recurso especificado no armazenamento.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Models\Produto $produto
   * @return \Illuminate\Http\Response
   * turn \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
  
      /**
      * Remova o recurso especificado do armazenamento.
      *
      * @param \App\Models\Produto $produto
      * @return \Illuminate\Http\Response
      */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'status'=> 'required',
            'local'=> 'required',
            'date'=> 'required',

          
        ]);      


       
        $product->update($request->all());
      
        return redirect()->route('products.index')
                        ->with('success','Evento atualizado com sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       $product->delete();
       
        return redirect()->route('products.index')
                        ->with('Sucesso','Evento deletado com sucesso');
    }
}