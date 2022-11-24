<form action="{{route('plans.store')}}"
      method="POST">

    @csrf
    Name of the Plan <input type="text" name="name">  <br /> <br />
    Price of the Plan  <input type="text" name="price">  <br /> <br />

    1 if special 0 if not    <input type="number" name="is_true"> <br /> <br />
    @if('is_true'==1)
        <span class="saleon">top sale</span>

    @endif
    <fieldset>
        <label>features yo want</label>
        <br />
    <input type="checkbox" name="features[]" value="online system" >online system<br />
    <input type="checkbox" name="features[]" value="full access">full access<br />
    <input type="checkbox" name="features[]" value="free apps">free apps<br />
        <input type="checkbox" name="features[]" value="multiple slider">multiple slider<br />
        <input type="checkbox" name="features[]" value="free domain">free domain<br />
        <input type="checkbox" name="features[]" value="support unlimited">support unlimited<br />
        <input type="checkbox" name="features[]" value="payment online">payment online<br />
        <input type="checkbox" name="features[]" value="cash back">cash back<br />



    </fieldset>
    <button type="submit">Send</button>
</form>
