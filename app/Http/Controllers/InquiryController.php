<?php

namespace App\Http\Controllers;

use App\Models\PortfolioInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'category' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        PortfolioInquiry::create($request->all());

        return response()->json(['success' => true, 'message' => 'Message sent successfully.']);
    }

    public function markAsRead(Request $request, $id)
    {
        $inquiry = PortfolioInquiry::findOrFail($id);
        $inquiry->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $inquiry = PortfolioInquiry::findOrFail($id);
        $inquiry->delete();

        return response()->json(['success' => true]);
    }
}
