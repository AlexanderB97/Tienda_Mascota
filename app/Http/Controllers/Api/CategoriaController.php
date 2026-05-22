<?php



namespace App\Http\Controllers\Api;



use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // GET: Listar todas las categorías
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias, 200);
    }

    // POST: Crear una nueva categoría (con validación)
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre'
        ]);

        $categoria = Categoria::create($request->all());
        return response()->json([
            'mensaje' => 'Categoría creada con éxito',
            'data' => $categoria
        ], 201);
    }

    // GET {id}: Mostrar una categoría específica
    public function show($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['mensaje' => 'Categoría no encontrada'], 404);
        }

        return response()->json($categoria, 200);
    }

    // PUT/PATCH {id}: Actualizar una categoría
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['mensaje' => 'Categoría no encontrada'], 404);
        }

        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $id
        ]);

        $categoria->update($request->all());

        return response()->json([
            'mensaje' => 'Categoría actualizada con éxito',
            'data' => $categoria
        ], 200);
    }

    // DELETE {id}: Eliminar una categoría
    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['mensaje' => 'Categoría no encontrada'], 404);
        }

        $categoria->delete();
        return response()->json(['mensaje' => 'Categoría eliminada correctamente'], 200);
    }
}
?>
