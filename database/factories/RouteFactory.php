<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cities = [
            "Ad Dakhla",
            "Ad Darwa",
            "Agadir",
            "Aguelmous",
            "Aïn Harrouda",
            "Aïn Ourir",
            "Ait Melloul",
            "Ait Ourir",
            "Al Aaroui",
            "Al Fqih Ben Çalah",
            "Al Hoceïma",
            "Al Khmissat",
            "Azemmour",
            "Azrou",
            "Azilal",
            "Barrechid",
            "Ben Guerir",
            "Beni Yakhlef",
            "Berkane",
            "Béni Mellal",
            "Biougra",
            "Bouskoura",
            "Boujad",
            "Casablanca",
            "El Aïoun",
            "El Hajeb",
            "El Jadid",
            "El Kelaa des Srarhna",
            "Errachidia",
            "Fnideq",
            "Fès",
            "Guelmim",
            "Guercif",
            "Imzouren",
            "Inezgane",
            "Jerada",
            "Kenitra",
            "Khénifra",
            "Kouribga",
            "Ksar El Kebir",
            "Laâyoune",
            "Larache",
            "M'diq",
            "Martil",
            "Mediouna",
            "Meknès",
            "Mohammedia",
            "Moulay Abdallah",
            "Mrirt",
            "My Drarga",
            "Nador",
            "Oued Zem",
            "Ouezzane",
            "Oujda-Angad",
            "Oulad Teïma",
            "Rabat",
            "Safi",
            "Sale",
            "Sefrou",
            "Settat",
            "Sidi Bennour",
            "Sidi Qacem",
            "Sidi Slimane",
            "Sidi Yahia El Gharb",
            "Sidi Yahya Zaer",
            "Skhirate",
            "Taza",
            "Taourirt",
            "Temara",
            "Temsia",
            "Tétouan",
            "Tit Mellil",
            "Youssoufia",
            "Zagora",
            "Zaïo",
            "Zeghanghane"
        ];
        return [
            'start_city' => fake()->randomElement($cities),
            'end_city' => fake()->randomElement($cities),
        ];
    }
}
