<div>
  <select class="tool-inputs" id="user_list_id" name="user_id[]" multiple="multiple">
    {{-- <option value="all" readonly
        {{ isset($unor) ? null : 'selected="selected"' }}>
        Pilih User </option> --}}


    @foreach ($users as $item)
      <option value="{{ $item->id }}">{{ $item->name.' / '. $item->email }}
      </option>
    @endforeach
</select>
</div>


<script>
   $(()=>{
        $("#user_list_id").css("min-width","300px");
        $("#user_list_id").select2({
                placeholder: "Silakan pilih user"
            });
    })
</script>