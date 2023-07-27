{{-- ! ERROR MESSAGE ! --}}
@if ($errors->any())
    <div class="mx-5 bg-white">
        <div class="w-full px-6 py-3 mt-5 text-white bg-red-400 rounded-md">
            <div class="grid grid-cols-1 px-5 mx-5 text-xs font-bold md:grid-cols-2 gap-x-1 md:text-md">
                @foreach ($errors->all() as $error)
                    <div class="text-left">
                        &bull; {{ $error }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

@if (session()->has('failures'))
    <div class="mt-5 mb-5 bg-white">
        <div class="relative mx-10 overflow-x-auto bg-red-400 rounded-lg">
            <div class="mx-10 mt-5 mb-5">
                <table class="w-full text-sm text-center text-white border-b-2">
                    <thead class="font-bold border-2 border-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">Row</th>
                            <th scope="col" class="px-6 py-3">Column</th>
                            <th scope="col" class="px-6 py-3">Errors</th>
                            <th scope="col" class="px-6 py-3">Value</th>
                        </tr>
                    </thead>

                    @foreach (session()->get('failures') as $validation)
                        <tbody class="border-l-2 border-r-2 border-white ">
                            <tr class="border-b-2 md:border-none">
                                <td class="font-bold border-r-2 border-white md:border-none">
                                    {{ $validation->row() }}
                                </td>
                                <td class="border-r-2 border-white md:border-none">
                                    {{ $validation->attribute() }}
                                </td>
                                <td class="border-r-2 border-white md:border-none">
                                    <ul>
                                        @foreach ($validation->errors() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="border-r-2 border-white md:border-none">
                                    {{ $validation->values()[$validation->attribute()] }}
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endif
