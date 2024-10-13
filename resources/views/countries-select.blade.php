<select @if(isset($id) )  id="{{$id}}" @else id="country" @endif class="form-select select2" name="country" @if(isset($required) && $required == 'yes') required @endif data-toggle="select2">

    <option value="">Select Country</option>
    @if(count(all_countries()) > 0 )
    @foreach(all_countries() as $country)
    <option @if(old('country', isset($contact) ? $contact->country_id : '' ) == $country->id) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
    @endforeach
    @endif

</select>

