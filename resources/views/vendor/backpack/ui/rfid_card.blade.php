@extends(backpack_view('blank'))

@section('content')
<div style="text-align: center; padding: 20px;">
    <h2>Generated RFID Card</h2>
    <!-- Close Tab Button -->
    <button onclick="window.close()" style="padding: 10px 20px; margin-bottom: 10px; background: grey ; color: white; border: none; cursor: pointer;">
        Close Tab
    </button>

    <br>

    <img src="{{ $imagePath }}" alt="RFID Card" style="max-width: 100%; border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">

    <br>
    <!-- Print Button -->
    <button onclick="printCard()" style="padding: 10px 20px; background: #7c69ef; color: white; border: none; cursor: pointer;">
        Print
    </button>

    <!-- Save Button -->
    <a href="{{ $imagePath }}" download="rfid_card.png" style="padding: 10px 20px; background: navy; color: white; text-decoration: none;">
        Save
    </a>
</div>

<script>
    function printCard() {
        var printWindow = window.open("", "_blank");
        printWindow.document.write('<html><head><title>Print</title>');
        printWindow.document.write('<style>@page { size: auto; margin: 0mm; orientation: landscape; } body { display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; } img { max-width: 100%; }</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<img src="{{ $imagePath }}" onload="window.print();window.close()" />');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
    }
</script>
@endsection
