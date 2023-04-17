<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body x-data="{
    isEnvelope: null,
    from: null,
    to: null,
    weight: '',
    height: '',
    width: '',
    length: '',
    selectedFrom: '',
    selectedTo: '',
    searchType: '',
    cities: [],
    searchCity: function(e, type) {
        // fetch cities from api
        this.searchType = type;
        let search = e.target.value;
        url = `{{route('cities.search')}}`+'?search='+search;
        if (search.length === 0){
            this.searchType = '';
            this.cities = [];
            if(type == 'from')
                this.from = null;
            else
                this.to = null;
            return;
        }
        fetch(url)
        .then(response => response.json())
        .then(data => {
            this.cities = data;
        });
    },
    calculatePrice: function() {
        alert(this.from);
        alert(this.to);
        alert(this.isEnvelope);
    }
}">
    <div class="flex justify-center items-center">
        <div class="w-full my-10">
            <h1 class="text-4xl text-center font-bold capitalize text-indigo-600">
                Gönderi Türü
            </h1>
        </div>
    </div>

    <div class="flex my-5 justify-center">
        <div class="w-1/2">
            <h1 class="text-center text-2xl my-3 font-bold text-indigo-500 capitalize cursor-pointer">
                zarf / dosya
            </h1>
            <img @click="isEnvelope=true"
                :class="isEnvelope ? 'bg-indigo-100 bg-opacity-75 border-indigo-300 border- p-1 border-4 rounded-md' : ''"
                src="{{asset('imgs/envelope.png')}}" alt="image" class="w-36 mx-auto cursor-pointer">
        </div>

        <div class="w-1/2">
            <h1 class="text-center text-2xl my-3 font-bold text-indigo-500 capitalize cursor-pointer">
                Koli
            </h1>
            <img @click="isEnvelope=false"
                :class="isEnvelope==false ? 'bg-indigo-100 bg-opacity-75 border-indigo-300 border- p-1 border-4 rounded-md' : ''"
                src="{{asset('imgs/parcel.png')}}" alt="image" class="w-36 mx-auto cursor-pointer">
        </div>
    </div>

    <form action="" method="post" class="flex justify-center" x-show="isEnvelope !== null">

        <div class="relative">
            <input x-model="selectedFrom" type="text" @keyup="searchCity($event, 'from')"
                class="border-2 border-indigo-400 w-60 text-indigo-800 p-2 mx-2 rounded-lg placeholder-indigo-500"
                placeholder="Nerden il veya plaka">

            <img src="{{asset('imgs/location.png')}}" class="absolute inset-y-1 right-2 mr-1 pl-1 h-8 w-8"
                alt="Search icon">
            <ul class="absolute z-10 top-full max-h-60 overflow-y-scroll left-1 w-full bg-white rounded-lg border border-gray-300 mt-2"
                x-show="cities.length > 0 & searchType == 'from'">
                <template x-for="city in cities">
                    <li x-text="city.name "
                        class="cursor-pointer p-3 border-1 border-b hover:bg-gray-50 font-bold text-indigo-500"
                        @click="selectedFrom=city.name;from=city.id;cities=[]"></li>
                </template>
            </ul>
        </div>



        <div class="relative">
            <input x-model="selectedTo" type="text" @keyup="searchCity($event, 'to')"
                class="border-2 border-indigo-400 w-60 text-indigo-800 p-2 mx-2 rounded-lg placeholder-indigo-500"
                placeholder="Nereye: il veya plaka">
            <img src="{{asset('imgs/location.png')}}" class="absolute inset-y-1 right-2 mr-1 pl-1 h-8 w-8"
                alt="Search icon">
                <ul class="absolute z-10 top-full max-h-60 overflow-y-scroll left-1 w-full bg-white rounded-lg border border-gray-300 mt-2"
                x-show="cities.length > 0 & searchType == 'to'">
                <template x-for="city in cities">
                    <li x-text="city.name "
                        class="cursor-pointer p-3 border-1 border-b hover:bg-gray-50 font-bold text-indigo-500"
                        @click="selectedTo=city.name;to=city.id;cities=[]"></li>
                </template>
            </ul>
        </div>
    </form>

    <div class="flex mt-10 justify-center" x-show="isEnvelope !== null">
        <button :disabled="from == null || to == null" :class="from == null || to == null ? 'bg-indigo-300': 'bg-indigo-600 hover:bg-indigo-700'" class="text-white rounded-md p-2 border font-bold " @click="calculatePrice">
            Calculate
        </button>
    </div>
</body>

</html>
