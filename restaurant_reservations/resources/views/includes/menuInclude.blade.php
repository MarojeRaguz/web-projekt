<link href="{{ asset('css/menu.css') }}" rel="stylesheet">

<table class="table w-75 p-3 text-center m-auto table-bordered">
  <thead class="table-dark border-dark">
    <th>Category</th>
    <th>Price</th>
  </thead>
  <tbody >
    @for($i=0;$i<sizeof($menu);$i++)
        @if ($i==0)
        <tr>
            <th colspan="2" class="table-warning">{{ $menu[$i]->category }}</th>
        </tr>
        @elseif($menu[$i]->category != $menu[$i-1]->category )
            <tr>
                <th colspan="2" class="table-warning">{{ $menu[$i]->category }}</th>
            </tr>
        @else
        <tr>
            <td>{{ $menu[$i]->meal }}</td>
            <td>{{ $menu[$i]->price }} $</td>
        </tr>
        @endif
    @endfor
</tbody>
</table>