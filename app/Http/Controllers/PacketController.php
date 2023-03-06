<?php

namespace App\Http\Controllers;

use App\Models\Packet;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PacketController extends Controller
{
    public function packetIndex(){
        $packets = Packet::orderBy('id','DESC')->get();
        return view('packets/index',compact('packets'));
    }

    public function addPacket(){
        $sizes = Size::all();
        return view('packets/add_packet', compact('sizes'));
    }

    public function addPacketForm(Request $request){
        $request->validate([
            'packet_name' => 'required',
            'size_id' => 'required',
        ],[
            'packet_name.required' => 'Enter your packet name',
            'size_id.required' => 'Fill up this field',
        ]);
        Packet::insert([
            'packet_name' =>$request->packet_name,
            'size_id' => $request->size_id,
            'packet_description' => $request->packet_description,
            'create_date' => Carbon::now(),
            'status' => $request->status ? 1 : 0, 
        ]);
        return redirect('packet/index')->with('success','Successfully Data Added');
    }

    public function packetEdit($id){
        $sizes = Size::all();
        $packets = Packet::findOrFail($id);
        return view('packets/edit', compact('packets','sizes'));
    }

    public function packetEdited(Request $request, $id){
        $request->validate([
            'packet_name' => 'required',
            'size_id' => 'required'
        ],[
            'packet_name.required' => 'Enter your packet name',
            'size_id.required' => 'Fill up this field'
        ]);
        Packet::findOrFail($id)->update([
            'packet_name' => $request->packet_name,
            'size_id' => $request->size_id,
            'packet_description' => $request->packet_description,
            'status' => $request->status ? 1 : 0, 
        ]);
        return redirect('packet/index')->with('update','Successfully Data Updated');
    }

    public function delete($id){
        Packet::findOrFail($id)->delete();
        return redirect('packet/index')->with('delete','Successfully Data Deleted');
    }
}
