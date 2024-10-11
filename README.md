<p align="center"><img src="https://www.plus-que-pro.fr/public/donnees/cms/sources/logos/logo.png" width="400" alt="Laravel Logo"></p>

## Lepever Philippe<br>PlusQuePro recruitment test

Here are the tasks required:
- [x] Installation of Git
- [x] Installation of the latest version of Laravel
- [x] Have a backoffice with restricted access (Jetstream, ...) 
- [x] Installation of React
- [x] Retrieve data from the api and store it in a database via an executable php artisan script (if possible)
- [x] A page listing the latest trending films of the day or month (1 page)
- [x] A page for viewing film information such as name, description, link to its image url + other information if possible
- [ ] Set up an infinite scroll on the film list, but code it yourself without a library
- [ ] A search page (with search bar optimization) and the list of films below (and search results, if any)
- [ ] A search page with a search field and a list of results below, each film being clickable to view film details on a second page
- [x] Regularly comment code on the repository to keep a clear history of your your work  
- [x] Using packages, Laravel and React best practices 
- [x] Docking a project

### Bonus tasks
- [ ] Data can be updated once a day
- [ ] Possibility of editing film file fields, making at least the title mandatory
- [ ] Possibility of deleting films 
- [ ] Search field to find a specific film quickly 
- [ ] Retrieve multiple categories and change product categories 
- [ ] Use of React for integration 


## Download Data from api via php Artisan

To create/update the movie list, simply type this command:

``` php artisan app:download-movies ```

## Docking a project
Coming soon

## Provide login/password
You'll need to create an account to access the dashboard.

## Document the research carried out to develop the app
- [Laravel's doc](https://laravel.com/docs/11.x/installation)
- [Grafikart's lessons](https://www.youtube.com/watch?v=xSfZwqzs_OM&list=PLjwdMgw5TTLXz1GRhKxSWYyDHwVW-gqrm)
- [jetstream's doc](https://jetstream.laravel.com/installation.html)
- [reactjs-inertiajs-jetstream-laravel lib](https://github.com/pkfan/reactjs-inertiajs-jetstream-laravel)
- [tailwindcss's doc](https://tailwindcss.com/docs/height)
- [stackoverflow: save data from api to database laravel](https://stackoverflow.com/questions/60395045/save-data-from-api-to-database-laravel)
- [Blog: Create custom artisan command](https://www.cloudways.com/blog/custom-artisan-commands-laravel/#:~:text=To%20create%20a%20new%20command,will%20be%20generated%20for%20you)
- [using laravel with react js](https://adevait.com/laravel/using-laravel-with-react-js)
- [tailwind: button group](https://www.material-tailwind.com/docs/html/button-group)
- [laraveljetstream unable to find component](https://laracasts.com/discuss/channels/livewire/laraveljetstream-unable-to-find-component-profileedit-profile-information-form?page=1&replyId=944247)
- [jetstream-docs about how to use the middlwares](https://laracasts.com/discuss/channels/code-review/jetstream-docs-about-how-to-use-the-middlwares)
- [laravel-scout: practical-guide](https://laravel-news.com/laravel-scout-practical-guide)

## Test Technique : Des Difficultés et un Engagement
Je vous remercie de m'avoir donné l'opportunité de participer à ce test technique. J'ai beaucoup apprécié l'occasion d'apprendre le framework Laravel, Jetstream, Eloquent et Tailwind avec deux briques API (themoviedb et en React) et de les mettre directement en pratique mes fraiches compétences (1 semaine). 

Malheureusement, je n'ai pas pu terminer le test dans le temps imparti. J'ai rencontré quelques difficultés, ce qui m'a fait perdre beaucoup de temps. Je reconnais que ces erreurs sont courantes et qu'un expert les aurait résolues rapidement. Voici les difficultés que j'ai dues surmonter :
1. Installation, le choix des bonnes librairies et leur configuration.
2. L'ajout de la commande sur 'php artisan' : C'est un point que j'ai du me former en direct...
3. La création du ServiceProvider pour les appels API vers themoviedb. Cela n'a pas fonctionné ! Après 1 heure de recherche, j'ai du opté sur la création d'un View/component (ApiTheMovieDBComponent) même si cette solution n'est pas élégente.
4. La nouvelle façon de faire des appels API est en passant par la classe HTTP. Cependant, Internet m'offrait que des exemples avec curl...
5. L'enregistrement des film via l'API themoviedb fut drôle : Il y a une limitation sur la pagination. Il est impossible d'aller au delà de la page 500. Dans la liste qui est retournée, il n'y a pas que des films... Il y a une fiche sur 'Christopher Nolan' qui merite d'avoir un film à son nom. Mais pour le moment, la fiche des réalisateurs ne doit pas apparaître dans la liste des films. De plus, il faut standardiser les données. C'est pour cette raison qu'il y a une condition à la ligne 94 et la fonction manipulateDataAfterGet dans la class ApiTheMovieDBComponent.
6. Permière utilisation de Tailwind dans la page Dashboard. La aussi, formation express.
7. Lors de la création de l'API, j'ai passé beaucoup de temps à mettre la sécurité sur les endpoint. J'ai fait beaucoup de recherche sur 'middleware' avec 'jetstream.auth_session' avec beaucoup de test. Cependant, je n'ai pas pu résoudre ce point.

Malgré tous ces obstacles, je suis très motivé à continuer d'apprendre et à me perfectionner dans ces technologies. J'ai déjà commencé à me familiariser avec Laravel, React et les API et je suis convaincu que je pourrai rapidement atteindre le niveau requis pour le poste que vous me proposez.
