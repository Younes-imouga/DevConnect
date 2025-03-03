<?php
namespace App\Http\Controllers;

use App\Models\Connections;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    public function sendConnection(Request $request)
    {
        $request->validate([
            'connected_user_id' => 'required|exists:users,id',
        ]);

        Connections::create([
            'user_id' => auth()->id(),
            'connected_user_id' => $request->connected_user_id,
            'status' => 'pending',
        ]);

        return response()->json(['success' => true]);
    }

    public function acceptConnection($id)
    {
        $connection = Connections::findOrFail($id);
        $connection->status = 'accepted';
        $connection->save();

        return redirect()->route('connection')->with('success', 'Connection accepted.');
    }

    public function declineConnection($id)
    {
        $connection = Connections::findOrFail($id);
        $connection->delete();

        return redirect()->route('connection')->with('success', 'Connection declined.');
    }
} 