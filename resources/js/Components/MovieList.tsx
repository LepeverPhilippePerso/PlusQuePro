import React from 'react';
import { Component } from "react";
import axios from "axios";

class MovieList extends Component {
  constructor(props) {
    super(props);
    this.state = {
      movies: [],
    };
  }
  fetchMovies() {
    axios
      .get('/api/movies')
      .then((response) => {
        response.data.forEach(function (movie) {
          movie.href = "/dashboard/movies/" + movie.id
        });
        this.setState({ movies: response.data });
      });
  }
  componentDidMount() {
    this.fetchMovies();
  }
  renderMovies() {
    return this.state.movies.map((movie) => (

      <><article key={movie.id} className="flex max-w-xl flex-col items-start justify-between">
        <a href={movie.href}>
          <img alt="" src={"https://image.tmdb.org/t/p/w200" + movie.backdrop_path} className="h-100 w-100 bg-gray-50" />
        </a>
        <div className="flex items-center gap-x-4 text-xs">
          <h3 className="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
            <a href={movie.href}>
              {movie.title}
            </a>
          </h3>
        </div>
        <div className="group relative">
          <div className="row flex">
            <a href={movie.href}>
              <button
                className="rounded-md rounded-r-none bg-blue-600 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-blue-700 focus:shadow-none active:bg-blue-700 hover:bg-blue-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button">
                Voir
              </button>
            </a>
            <button
              className="rounded-none bg-amber-600 py-2 px-4 border-l border-r border-amber-400 text-center text-sm text-slate-800 transition-all shadow-md hover:shadow-lg focus:bg-amber-700 focus:shadow-none active:bg-amber-700 hover:bg-amber-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
              type="button"
            >
              Editer
            </button>
            <button
              className="rounded-md rounded-l-none bg-red-600 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-red-700 focus:shadow-none active:bg-red-700 hover:bg-red-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
              type="button">
              Supprimer
            </button>
          </div>
        </div>

      </article></>

    ));
  }
  render() {
    return (

        <div className="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
          <h1 className="mt-8 text-2xl font-medium text-gray-900 dark:text-white">Derniers films</h1>
          <div className="p-8">
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-8">
                {this.renderMovies()}
              </div>
          </div>
        </div>
    );
  }
}
export default MovieList;
