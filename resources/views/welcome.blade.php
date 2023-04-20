<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body x-init="$watch('isEnvelope', (value, oldValue) => reset())" x-data="{
    isEnvelope: null,
    from: null,
    to: null,
    weight: null,
    height: null,
    width: null,
    length: null,
    selectedFrom: '',
    selectedTo: '',
    searchType: '',
    cities: [],
    prices: [],
    isLoading: false,
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

        let data = {
            from: this.from,
            to: this.to,
            weight: this.weight,
            height: this.height,
            width: this.width,
            length: this.length,
            is_envelope: this.isEnvelope
        }
        url = `{{route('calculate.price')}}`;

        const self = this;
        self.isLoading = true;
            fetch(url, {
                method: 'POST',
                headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                },
                body: JSON.stringify(data)
            })    .then(response => response.json())
            .then(prices => {
                self.prices = prices.data;
        self.isLoading = false;
        window.scrollTo(0,document.body.scrollHeight);

            });

    },
    reset: function() {
        this.weight = null;
        this.height = null;
        this.width = null;
        this.length = null;
        this.searchType = '';
        this.cities = [];
        this.prices = [];
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
        <div class="mx-10">
            <h1 class="text-center text-2xl my-3 font-bold text-indigo-500 capitalize cursor-pointer">
                zarf / dosya
            </h1>
            <img @click="isEnvelope=true"
                :class="isEnvelope ? 'bg-indigo-100 bg-opacity-75 border-indigo-300 border- p-1 border-4 rounded-md' : ''"
                src="{{asset('imgs/envelope.png')}}" alt="image" class="w-36 mx-auto cursor-pointer">
        </div>

        <div class="mx-10">
            <h1 class="text-center text-2xl my-3 font-bold text-indigo-500 capitalize cursor-pointer">
                Koli
            </h1>
            <img @click="isEnvelope=false"
                :class="isEnvelope==false ? 'bg-indigo-100 bg-opacity-75 border-indigo-300 border- p-1 border-4 rounded-md' : ''"
                src="{{asset('imgs/parcel.png')}}" alt="image" class="w-36 mx-auto cursor-pointer">
        </div>
    </div>

    <form action="" method="post" class="flex flex-col items-center lg:flex-row justify-center mt-10" x-show="isEnvelope !== null">

        <div class="relative">
        <p class="ml-2">Nerden</p>
            <input x-model="selectedFrom" type="text" @keyup="searchCity($event, 'from')"
                class="border-2 border-indigo-400 w-60 text-indigo-800 p-2 mx-2 rounded-lg placeholder-indigo-400"
                placeholder=" il adı veya plaka">

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

        <p class="ml-2 mt-2 lg:mt-0">Nereye</p>
            <input x-model="selectedTo" type="text" @keyup="searchCity($event, 'to')"
                class="border-2 border-indigo-400 w-60 text-indigo-800 p-2 mx-2 rounded-lg placeholder-indigo-400"
                placeholder="il adı veya plaka">

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
    <div class="flex flex-col lg:flex-row mt-7 items-center justify-center" x-show="isEnvelope == false">
        <div class="relative mb-3">

        <p class="ml-2">En</p>
            <input x-model="width" type="text" min="0"
                class="border-2 border-indigo-400 w-60 text-indigo-800 p-2 mx-2 rounded-lg"
                placeholder="">
            <p class="absolute inset-y-8 right-3 mr-1 text-indigo-800">CM</p>
        </div>

        <div class="relative mb-3">
            <p class="ml-2">Boy</p>

            <input x-model="length" type="text" min="0"
                class="border-2 border-indigo-400 w-60 text-indigo-800 p-2 mx-2 rounded-lg"
                placeholder="">
            <p class="absolute inset-y-8 right-3 mr-1 text-indigo-800">CM</p>
        </div>

        <div class="relative mb-3">
            <p class="ml-2">Yükseklik</p>

            <input x-model="height" type="text" min="0"
                class="border-2 border-indigo-400 w-60 text-indigo-800 p-2 mx-2 rounded-lg"
                placeholder="">
            <p class="absolute inset-y-8 right-3 mr-1 text-indigo-800">CM</p>
        </div>

        <div class="relative mb-3">
            <p class="ml-2">Ağırlık</p>

            <input x-model="weight" type="text" min="0"
                class="border-2 border-indigo-400 w-60 text-indigo-800 p-2 mx-2 rounded-lg"
                placeholder="">
            <p class="absolute inset-y-8 right-3 mr-1 text-indigo-800">KG</p>
        </div>
    </div>
    <div class="flex mt-5  justify-center" x-show="isEnvelope == true">
        <div class="relative rounded-xl overflow-auto p-0">
            <div class="flex items-center justify-center">
              <button @click="calculatePrice"  :class="from == null || to == null  || isLoading == true ? 'bg-indigo-500 cursor-not-allowed': 'bg-indigo-600 hover:bg-indigo-700'" type="button" class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-white  hover:bg-indigo-400 transition ease-in-out duration-150" :disabled="from == null || to == null || isLoading == true">
                <svg x-show="isLoading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="capitalize" x-text="isLoading ? 'hesaplıyor...' : 'hesapla'"></span>
              </button>
            </div>
          </div>
    </div>

    <div class="flex my-3 lg:my-5 justify-center" x-show="isEnvelope == false">
        <div class="relative rounded-xl overflow-auto p-0">
            <div class="flex items-center justify-center">
              <button @click="calculatePrice"  :class="from == null || to == null  || isLoading == true ? 'bg-indigo-500 cursor-not-allowed': 'bg-indigo-600 hover:bg-indigo-700'" type="button" class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-white  hover:bg-indigo-400 transition ease-in-out duration-150" :disabled="from == null || to == null || isLoading == true">
                <svg x-show="isLoading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="capitalize" x-text="isLoading ? 'hesaplıyor...' : 'hesapla'"></span>
              </button>
            </div>
          </div>
    </div>

        <template x-for="price in prices">
        <div class="flex my-10 justify-center">
                <div class="flex justify-center">
                    <div class="w-1/2">
                        <p class="text-center text-indigo-500 font-bold" x-text="price.code"></p>
                        <p class="text-center text-indigo-500 italic" x-text="`Not: ${price.note}`" x-show="price.note != null"></p>
                    </div>
                    <div class="w-1/2">
                        <p class="text-center text-indigo-500 font-bold" x-text="price.price == null ? 'Belli Değil' : price.price "></p>
                    </div>
                </div>
            </div>
        </template>
</body>

</html>
