<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller

{


   
    // GET: Listar todos los artículos con su categoría vinculada
    public function index()
    {
        $articulos = Articulo::with('categoria')->get();
        return response()->json($articulos, 200);
    }

    // POST: Crear un nuevo artículo (con validaciones de campos y existencia de categoría)
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id' // Valida que la categoría realmente exista
        ]);

        $articulo = Articulo::create($request->all());
        return response()->json([
            'mensaje' => 'Artículo registrado con éxito',
            'data' => $articulo
        ], 201);
    }

    // GET {id}: Mostrar un artículo específico con su categoría
    public function show($id)
    {
        $articulo = Articulo::with('categoria')->find($id);

        if (!$articulo) {
            return response()->json(['mensaje' => 'Artículo no encontrado'], 404);
        }

        return response()->json($articulo, 200);
    }

    // PUT/PATCH {id}: Actualizar los datos de un artículo
    public function update(Request $request, $id)
    {
        $articulo = Articulo::find($id);

        if (!$articulo) {
            return response()->json(['mensaje' => 'Artículo no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        $articulo->update($request->all());

        return response()->json([
            'mensaje' => 'Artículo actualizado con éxito',
            'data' => $articulo
        ], 200);
    }

    // DELETE {id}: Eliminar un artículo de la base de datos
    public function destroy($id)
    {
        $articulo = Articulo::find($id);

        if (!$articulo) {
            return response()->json(['mensaje' => 'Artículo no encontrado'], 404);
        }

        $articulo->delete();
        return response()->json(['mensaje' => 'Artículo eliminado correctamente'], 200);
    }
}

?>