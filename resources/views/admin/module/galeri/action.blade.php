
<a href="{{route('admin.transaksi.galeri.edit', $id)}}" id="update" data-toggle="tooltip" data-original-title="Update" class="update btn btn-success btn-xs">
	Edit
</a>


<a onclick="destroyData({{ $id }})" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn-xs" style="color:#ffffff">
	Delete
</a>



<a onclick="CopyUrlToClipBoard({{ $id }})" data-toggle="tooltip" data-original-title="Copy Url To ClipBoard" class="delete btn btn-success btn-xs" style="color:#ffffff">
	Copy Url
</a>

