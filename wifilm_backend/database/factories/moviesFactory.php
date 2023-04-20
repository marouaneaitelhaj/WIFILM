<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\genres;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\movies>
 */
class moviesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                "The Shawshank Redemption",
                "The Godfather",
                "The Dark Knight",
                "Pulp Fiction",
                "The Silence of the Lambs",
                "Schindler's List",
                "Forrest Gump",
                "The Lord of the Rings: The Fellowship of the Ring",
                "Fight Club",
                "Star Wars: Episode IV - A New Hope",
                "Inception",
                "Titanic",
                "The Matrix",
                "Goodfellas",
                "Saving Private Ryan",
                "The Green Mile",
                "Interstellar",
                "The Prestige",
                "The Departed",
                "Jurassic Park",
                "The Lion King",
                "Terminator 2: Judgment Day",
                "The Avengers",
                "The Social Network",
                "Gladiator",
                "Rocky",
                "Back to the Future",
                "The Breakfast Club",
                "The Princess Bride",
                "The Exorcist",
                "Alien",
                "Jaws",
                "The Thing",
                "The Shining",
                "Halloween",
                "Psycho",
                "The Sixth Sense",
                "The Blair Witch Project",
                "The Conjuring",
                "A Clockwork Orange",
                "La La Land",
                "The Grand Budapest Hotel",
                "Get Out",
                "Moonlight",
                "Mad Max: Fury Road",
                "Wonder Woman",
                "Black Panther",
                "A Star is Born",
                "Once Upon a Time in Hollywood",
                "Parasite"
            ]),
            'description' => $this->faker->randomElement([
                "A man is wrongfully imprisoned for the murder of his wife and spends the next two decades in prison, forming a close bond with a fellow inmate.",
                "A powerful crime family in New York City must navigate a series of challenges and conflicts as they try to maintain their grip on the city.",
                "Batman must face off against the Joker, a deranged criminal who is wreaking havoc on Gotham City.",
                "A series of interconnected stories featuring hitmen, a boxer, a gangster's wife, and other colorful characters.",
                "A young FBI agent must turn to a notorious serial killer for help in catching another serial killer who is on the loose.",
                "A German businessman saves the lives of more than a thousand Jewish refugees during World War II.",
                "A slow-witted but kind-hearted man experiences many of the defining moments of the 20th century, while also searching for his true love.",
                "A hobbit named Frodo must destroy a powerful ring that could bring about the end of the world.",
                "A disillusioned office worker forms an underground fight club with a charismatic anarchist.",
                "A young farm boy joins a group of rebels to take down an evil empire and rescue a princess.",
                "A skilled thief is hired to plant an idea in someone's mind by entering their dreams.",
                "A wealthy woman falls in love with a poor artist aboard the ill-fated Titanic.",
                "A computer hacker discovers that the world as he knows it is a simulated reality created by machines.",
                "A young man rises through the ranks of the Italian mafia, but struggles to maintain his status as the FBI closes in.",
                "A group of soldiers must rescue a paratrooper behind enemy lines during World War II.",
                "A death row corrections officer forms a bond with a giant inmate who possesses supernatural powers.",
                "A group of astronauts travels through a wormhole to find a new home for humanity.",
                "Two rival magicians engage in a dangerous and deadly competition.",
                "A young cop goes undercover to infiltrate a powerful Irish-American crime syndicate in Boston.",
                "A billionaire creates a theme park featuring genetically-engineered dinosaurs, but things go terribly wrong.",
                "A young lion prince must take his rightful place as king after his father is murdered.",
                "A cyborg is sent back in time to protect a young boy who will play a crucial role in the future of humanity.",
                "A group of superheroes, including Iron Man, Captain America, and Thor, must band together to save the world from an alien invasion.",
                "The story of how Mark Zuckerberg created Facebook and became one of the youngest billionaires in history.",
                "A Roman general seeks revenge against the emperor who murdered his family.",
                "An underdog boxer gets a shot at the heavyweight title and must prove himself in the ring.",
                "A teenager travels back in time and accidentally interferes with his parents' romance.",
                "A group of high school students from different cliques are forced to spend a Saturday together in detention.",
                "A classic fairy tale adventure involving a beautiful princess, a brave hero, and a wicked prince.",
                "A young girl is possessed by a demonic entity, and her mother turns to two priests for help.",
                "The crew of a commercial spaceship investigates a distress signal and discovers a deadly alien creature.",
                "A giant great white shark terrorizes a small beach community.",
                "A group of scientists in Antarctica are stalked by a shape-shifting alien.",
                "A writer and his family move into a hotel for the winter, but the isolation and supernatural forces drive him insane.",
                "A psychotic killer escapes from a mental institution and returns to his hometown to continue his reign of terror.",
                "A young boy who can communicate with the dead must use his abilities to help a troubled spirit move on.",
                "A group of filmmakers head into the woods to make a documentary about a local legend, but soon realize they are not alone.",
            ]),
            'image' => $this->faker->randomElement([
                "https://m.media-amazon.com/images/M/MV5BZWI3ZThmYzUtNDJhOC00ZWY4LThiNmMtZDgxNjE3Yzk4NDU1XkEyXkFqcGdeQXVyNTk5Nzg1NjQ@._V1_SX300.jpg",
                "https://m.media-amazon.com/images/M/MV5BMGYyZTk5MjYtNGY2ZS00NzRhLTgwMWMtZjhmMmQ4OGFkNTNiXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_SX300.jpg",
                "https://m.media-amazon.com/images/M/MV5BMTU0NDE5NTU0OV5BMl5BanBnXkFtZTcwMzI1OTMzOQ@@._V1_SX300.jpg",
                "https://m.media-amazon.com/images/M/MV5BMGUyM2ZiZmUtMWY0OC00NTQ4LThkOGUtNjY2NjkzMDJiMWMwXkEyXkFqcGdeQXVyMzY0MTE3NzU@._V1_SX300.jpg",
                "https://m.media-amazon.com/images/M/MV5BOTg4ZTNkZmUtMzNlZi00YmFjLTk1MmUtNWQwNTM0YjcyNTNkXkEyXkFqcGdeQXVyNjg2NjQwMDQ@._V1_SX300.jpg",
                "https://m.media-amazon.com/images/M/MV5BZGVmY2RjNDgtMTc3Yy00YmY0LTgwODItYzBjNWJhNTRlYjdkXkEyXkFqcGdeQXVyMjM4NTM5NDY@._V1_SX300.jpg",
                "https://m.media-amazon.com/images/M/MV5BNmJhNTgzMWYtZTU5OC00MmE2LTlkN2UtNWE0MmJiNWJmNmZjXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg",
                "https://m.media-amazon.com/images/M/MV5BYWZjMjk3ZTItODQ2ZC00NTY5LWE0ZDYtZTI3MjcwN2Q5NTVkXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_SX300.jpg",
                "https://m.media-amazon.com/images/M/MV5BMGUwZjliMTAtNzAxZi00MWNiLWE2NzgtZGUxMGQxZjhhNDRiXkEyXkFqcGdeQXVyNjU1NzU3MzE@._V1_SX300.jpg",
                "https://m.media-amazon.com/images/M/MV5BMzFiYWQxYzgtOThmYi00ZmIwLWFlZWMtMzk2NTI2YTYzMjkyXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_SX300.jpg",
            ]),
        ];
    }
}
