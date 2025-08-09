@php
        $role = Auth::user()->role_id;
        switch ($role) {
            case 1:
                $role = "Super Admin";
                break;
            case 2:
                $role = "National Admin";
                break;
            case 3:
                $role = "Wilaya Admin";
                break;
            case 4:
                $role = "Baladia Admin";
                break;
            case 5:
                $role = "Neighborhood Admin";
                break;
            default:
                $role = "User";
                break;
        }
    @endphp
<div class="flex flex-row justify-between items-center bg-white border-b border-gray-200 px-6 py-3 shadow-sm">
    <a href="{{ route('homepage') }}" 
       class="font-semibold text-gray-700 hover:text-gray-900 transition">
        {{ $role }} {{ __('Account') }}
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
                    class="bg-red-500 px-4 py-1 rounded-lg hover:bg-red-600 transition">
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
