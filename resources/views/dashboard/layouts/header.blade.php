<div class="flex flex-row border border-gray-200 justify-between">
    <h1 class="p-2 cursor-pointer hover:bg-gray-200">{{ Auth::user()->name }} {{__('Account')}}</h1>
    <div class="flex flex-row">
        <select name="lang" id="lang">
            <option value="en">{{__('English')}}</option>
            <option value="ar">{{__('Arabic')}}</option>
        </select>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="p-2 cursor-pointer hover:bg-gray-200">{{__('Logout')}}</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('lang').addEventListener('change', function() {
        document.getElementById('lang').submit();
        document.getElementById('lang').value = this.value;
    });
</script>
