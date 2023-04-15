namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class TestController extends Controller{
    public function test()
    {        
        Storage::disk('local')->put('example.txt', 'Contents');
    }
{