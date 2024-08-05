<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    public function index()
    {
        $attributeValues = AttributeValue::all();
        return view('attribute-values.index', compact('attributeValues'));
    }

    public function create()
    {
        $attributes = Attribute::all();
        return view('attribute-values.create', compact('attributes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|string|max:255',
            'attribute_id' => 'required|exists:attributes,id',
            'attributable_id' => 'required|integer',
            'attributable_type' => 'required|string',
        ]);

        $attributeValue = new AttributeValue();
        $attributeValue->attribute_id = $request->attribute_id;
        $attributeValue->value = $request->value;
        $attributeValue->attributable_id = $request->attributable_id;
        $attributeValue->attributable_type = $request->attributable_type;
        $attributeValue->save();
        return redirect()->route('attribute-values.index');
    }

    public function show(AttributeValue $attributeValue)
    {
        return view('attribute-values.show', compact('attributeValue'));
    }

    public function edit(AttributeValue $attributeValue)
    {
        return view('attribute-values.edit', compact('attributeValue'));
    }

    public function update(Request $request, AttributeValue $attributeValue)
    {
        $request->validate([
            'value' => 'required|string|max:255',
        ]);

        $attributeValue->update($request->all());
        return redirect()->route('attribute-values.index');
    }

    public function destroy(AttributeValue $attributeValue)
    {
        $attributeValue->delete();
        return redirect()->route('attribute-values.index');
    }
}
