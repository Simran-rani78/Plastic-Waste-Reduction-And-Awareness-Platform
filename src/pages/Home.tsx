import React from 'react';
import { Link } from 'react-router-dom';

const Home = () => {
  const features = [
    {
      title: 'Recycling Points',
      description: 'Find nearby recycling centers and drop-off points for plastic waste.',
      icon: '♻️',
    },
    {
      title: 'Education Programs',
      description: 'Learn about plastic pollution and sustainable alternatives.',
      icon: '📚',
    },
    {
      title: 'Eco-friendly Alternatives',
      description: 'Discover sustainable products and practices to reduce plastic usage.',
      icon: '🌱',
    },
    {
      title: 'Community Initiatives',
      description: 'Join local campaigns and connect with environmental organizations.',
      icon: '🤝',
    },
  ];

  return (
    <div className="bg-white">
      {/* Hero Section */}
      <div className="relative bg-primary-600">
        <div className="max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
          <div className="text-center">
            <h1 className="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
              Together for a Plastic-Free Future
            </h1>
            <p className="mt-6 max-w-2xl mx-auto text-xl text-primary-100">
              Join our community in reducing plastic waste and promoting sustainable living.
              Find resources, connect with organizations, and make a difference.
            </p>
            <div className="mt-10">
              <Link
                to="/register"
                className="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-primary-600 bg-white hover:bg-primary-50"
              >
                Get Started
              </Link>
            </div>
          </div>
        </div>
      </div>

      {/* Features Section */}
      <div className="py-12 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center">
            <h2 className="text-3xl font-extrabold text-gray-900 sm:text-4xl">
              How You Can Make a Difference
            </h2>
            <p className="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
              Discover tools and resources to help you reduce plastic waste in your daily life.
            </p>
          </div>

          <div className="mt-10">
            <div className="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4">
              {features.map((feature) => (
                <div
                  key={feature.title}
                  className="pt-6"
                >
                  <div className="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                    <div className="-mt-6">
                      <div>
                        <span className="inline-flex items-center justify-center p-3 bg-primary-500 rounded-md shadow-lg text-4xl">
                          {feature.icon}
                        </span>
                      </div>
                      <h3 className="mt-8 text-lg font-medium text-gray-900 tracking-tight">
                        {feature.title}
                      </h3>
                      <p className="mt-5 text-base text-gray-500">
                        {feature.description}
                      </p>
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>

      {/* Call to Action */}
      <div className="bg-primary-50">
        <div className="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
          <h2 className="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            <span className="block">Ready to make a difference?</span>
            <span className="block text-primary-600">Join our community today.</span>
          </h2>
          <div className="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            <div className="inline-flex rounded-md shadow">
              <Link
                to="/register"
                className="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700"
              >
                Get started
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Home; 