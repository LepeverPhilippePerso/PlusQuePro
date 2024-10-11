import React from 'react';
import { Component } from "react";
import axios from "axios";

class MovieRead extends Component {
  constructor(props) {
    super(props);
    this.state = {
      movie: [],
    };
  }
  fetchMovie() {
    axios
      .get('/api/movies/1')
      .then((response) => {
        console.log(response.data.movie);
        this.setState({ movie: response.data.movie });
      });
  }
  componentDidMount() {
    this.fetchMovie();
  }
  renderMovie() {
    return (
      <div>
        <img alt="" src={"https://image.tmdb.org/t/p/w200" + this.state.movie.backdrop_path} className="h-100 w-100 bg-gray-50" />
        <h1 className="mt-8 text-2xl font-medium text-gray-900 dark:text-white">{this.state.movie.title}</h1>
        <p>{this.state.movie.overview}</p>
      
      <div className="group relative">
        <div className="row flex">
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
    </div>
    )
  }

  render() {
    return (

        <div className="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
          <h1 className="mt-8 text-2xl font-medium text-gray-900 dark:text-white">Fiche du Film</h1>
          <div className="p-8">
                {this.renderMovie()}
          </div>
        </div>
    );
  }
}
export default MovieRead;
