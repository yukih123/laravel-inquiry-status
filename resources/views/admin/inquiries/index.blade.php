<table>
@foreach($inquiries as $inquiry)
<tr>
    <td>{{ $inquiry->name }}</td>
    <td>{{ $inquiry->email }}</td>
    <td>{{ $inquiry->status }}</td>
    <td>{{ $inquiry->created_at }}</td>
</tr>
@endforeach
</table>

