<div class="fixed top-0 left-0 z-10 hidden w-full" id="import-modal">
    <div
        class="flex items-center justify-center pt-4 pb-20 overflow-auto text-center md:px-4 min-height-100vh sm:block sm:p-0 ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-900 opacity-75" />
        </div>
        <form action="{{ route('student-import-excel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="inline-block w-11/12 mx-5 mt-5 mb-10 text-left transition-all transform bg-white rounded-lg shadow-xl md:w-2/4 align-center sm:align-center"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="pt-5 text-2xl font-bold text-center text-black underline bg-white rounded-t-lg">Import Excel
                    File
                </div>
                <div class="px-5 pt-5 bg-white">
                    <div class="">
                        <label class="block mb-2 text-sm font-bold text-black" for="default_size">Import File:</label>
                        <input
                            class="block w-full text-lg text-black bg-white border border-gray-300 rounded-lg cursor-pointer"
                            id="large_size" name="students" type="file">
                        <span class="py-2 text-sm font-medium text-red-500">
                            @error('import_excel')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <br>

                    <div class="flex items-center justify-center px-4 py-3 mb-5 text-right bg-gray-200 rounded-lg">
                        <button type="submit"
                            class="px-4 py-2 mr-2 text-white bg-blue-700 rounded hover:bg-blue-800 hover:duration-300">
                            <i class="fas fa-plus"></i> Import File
                        </button>
                        <button type="button"
                            class="px-4 py-2 mr-2 text-white bg-red-600 rounded hover:bg-red-700 hover:duration-300"
                            onclick="importToggleModal()">
                            <i class="fa-sharp fa-solid fa-xmark"></i> Cancel
                        </button>
                    </div>
                </div>
        </form>
    </div>
</div>
