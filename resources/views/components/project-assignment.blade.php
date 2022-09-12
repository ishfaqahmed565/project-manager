<select class="form-control min-w-full" name="project-assignment[]" multiple="multiple">
   @foreach($members as $member)
    <option value="{{$member->id}}">{{$member->name}}</option>
   @endforeach 
</select>