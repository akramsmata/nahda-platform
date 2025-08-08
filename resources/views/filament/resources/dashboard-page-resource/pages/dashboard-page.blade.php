<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
        <x-filament::card>
            <div class="text-center">
                <h2 class="text-lg font-bold">عدد الأعضاء</h2>
                <p class="text-3xl text-primary">{{ $this->getStats()['members'] }}</p>
            </div>
        </x-filament::card>

        <x-filament::card>
            <div class="text-center">
                <h2 class="text-lg font-bold">عدد الصحفيين</h2>
                <p class="text-3xl text-primary">{{ $this->getStats()['journalists'] }}</p>
            </div>
        </x-filament::card>

        <x-filament::card>
            <div class="text-center">
                <h2 class="text-lg font-bold">عدد المستخدمين</h2>
                <p class="text-3xl text-primary">{{ $this->getStats()['users'] }}</p>
            </div>
        </x-filament::card>

        <x-filament::card>
            <div class="text-center">
                <h2 class="text-lg font-bold">عدد الولايات</h2>
                <p class="text-3xl text-primary">{{ $this->getStats()['wilayas'] }}</p>
            </div>
        </x-filament::card>
    </div>
</x-filament::page>
