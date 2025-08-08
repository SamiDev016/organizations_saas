<div class="flex flex-row justify-between items-center bg-white border-b border-gray-200 px-6 py-3 shadow-sm">
    <a href="{{ route('homepage') }}" 
       class="font-semibold text-gray-700 hover:text-gray-900 transition">
        {{ Auth::user()->name }} {{ __('Account') }}
    </a>
    <div class="flex items-center space-x-4">
        <select name="lang" id="lang" 
                class="border border-gray-300 rounded-lg px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="en">{{ __('English') }}</option>
            <option value="ar">{{ __('Arabic') }}</option>
        </select>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                    class="bg-red-500 text-white px-4 py-1 rounded-lg hover:bg-red-600 transition">
                {{ __('Logout') }}
            </button>
        </form>
    </div>
</div>


<!-- <script>
    document.getElementById('lang').addEventListener('change', function() {
        this.form?.submit();
        this.value = this.value;
    });
</script> -->
