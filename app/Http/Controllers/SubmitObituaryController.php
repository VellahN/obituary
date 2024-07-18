namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obituary;

class SubmitObituaryController extends Controller
{
    public function submitObituary(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'date_of_birth' => 'required|date',
            'date_of_death' => 'required|date',
            'content' => 'required|string',
            'author' => 'required|string'
        ]);

        $obituary = new Obituary();
        $obituary->name = $validatedData['name'];
        $obituary->date_of_birth = $validatedData['date_of_birth'];
        $obituary->date_of_death = $validatedData['date_of_death'];
        $obituary->content = $validatedData['content'];
        $obituary->author = $validatedData['author'];

        try {
            $obituary->save();
            return response()->json(['message' => 'Obituary submitted successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error submitting obituary: '. $e->getMessage()], 500);
        }
    }
}