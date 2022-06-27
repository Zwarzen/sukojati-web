<!-- <a href="javascript:void(0)" data-toggle="tooltip" onClick="editFunc({{ $id }})" data-original-title="Edit" class="edit btn btn-success edit btn-xs">
Edit
</a> -->

<a href="{{route('admin.transaksi.popupinfo.edit', $id)}}" id="update" data-toggle="tooltip" data-original-title="Update" class="update btn btn-success btn-xs">
	Edit
</a>
<!-- <a href="javascript:void(0);" id="delete" onClick="deletdata({{ $id }})" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn-xs">
	Delete
</a> -->
{{-- <a href="{{route('admin.master.kategorigaleri.destroy', $id)}}" id="delete" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn-xs">
	Delete
</a> --}}



<a onclick="destroyData({{ $id }})" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn-xs" style="color:#ffffff">
	Delete
</a>

