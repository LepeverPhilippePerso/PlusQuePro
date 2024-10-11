import React from 'react';
import Welcome from '@/Components/Welcome';
import AppLayout from '@/Layouts/AppLayout';
import MovieReadOne from '@/Components/MovieReadOne';

export default function MovieRead() {
  return (
    <AppLayout
      title="Movie"
      renderHeader={() => (
        <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Movie
        </h2>
      )}
    >
      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
          <MovieReadOne />
          </div>
        </div>
      </div>
    </AppLayout>
  );
}
