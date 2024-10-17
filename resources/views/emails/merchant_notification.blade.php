<h1>New Order Received</h1>
<p>Shipping Address:</p>
<ul>
    <li>Name: {{ $name }}</li>
    <li>Line 1: {{ $address->line1 }}</li>
    <li>Line 2: {{ $address->line2 }}</li>
    <li>City: {{ $address->city }}</li>
    <li>State: {{ $address->state }}</li>
    <li>Country: {{ $address->country }}</li>
    <li>Postal Code: {{ $address->postal_code }}</li>
</ul>

<h2>Order Summary</h2>
@if(!empty($line_items))
    @foreach($line_items as $item)
        <p>{{ $item->description }} - Quantity: {{ $item->quantity }}</p>
    @endforeach
@else
    <p>No line items available.</p>
@endif
