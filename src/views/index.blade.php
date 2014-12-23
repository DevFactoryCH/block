

<table class="table">
  <thead>
    <tr>
      <th></th>
      <th></th>
    </tr>
  </thead>
  @foreach ($blocks as $block)
    <tr>
      <td>{{ $block->title }}</td>
    </tr>
  @endforeach
</table>