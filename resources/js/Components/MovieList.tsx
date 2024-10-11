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
      .then((response) => this.setState({ movies: response.data }));
  }
  componentDidMount() {
    this.fetchMovies();
  }
  renderMovies() {
    console.log(this.state);
    return this.state.movies?.map((movie) => (
      <tr key={movie.id}>
        <td className="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
          {movie.title}
        </td>
        <td className="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
          {movie.overview}
        </td>
      </tr>
    ));
  }
  render() {
    return (
      <div className="overflow-hidden overflow-x-auto p-6 bg-white border-gray-200">
        <div className="min-w-full align-middle">
          <table className="min-w-full divide-y divide-gray-200 border">
            <thead>
              <tr>
                <th className="px-6 py-3 bg-gray-50">
                  <span className="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Title</span>
                </th>
                <th className="px-6 py-3 bg-gray-50">
                  <span className="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">overview</span>
                </th>
                
              </tr>
            </thead>
            <tbody className="table-body">
              {this.renderMovies()}
            </tbody>
          </table>
        </div>
      </div>
    );
  }
}
export default MovieList;


/*
export default function MovieList() {
  return (
    <div>
      <div className="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        

        <h1 className="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
          AAAA
        </h1>

        <p className="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
          content
        </p>
      </div>

    </div>
  );
}
*/