<!-- <a href="javascript:void(0)" data-toggle="tooltip" onClick="editFunc({{ $id }})" data-original-title="Edit" class="edit btn btn-success edit btn-xs">
Edit
</a> -->

<a href="{{route('opd.edit', $id)}}" id="update" data-toggle="tooltip" data-original-title="Update" class="update btn btn-success btn-xs">
	Edit
</a>
<!-- <a href="javascript:void(0);" id="delete" onClick="deletdata({{ $id }})" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn-xs">
	Delete
</a> -->
<a href="{{route('galeri.delete', $id)}}" id="delete" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn-xs">
	Delete
</a>