namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obituary;

class ViewObituariesController extends Controller
{
    public function viewObituaries(Request $request)
    {
        $obituaries = Obituary::all();

        return view('obituaries', ['obituaries' => $obituaries]);
    }
}