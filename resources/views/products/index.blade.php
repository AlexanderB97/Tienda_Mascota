<h1>Lista de Producto</h1>
<ul>
    @forelse ($products as $product)
    <li>{{$product->name}} - ${{$product->price}}</li>
    @empty
    <li>No hay productos.</li>
    @endforelse
</ul>