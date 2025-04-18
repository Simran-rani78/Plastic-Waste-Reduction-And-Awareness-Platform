import React, { useState } from 'react';

interface Resource {
  id: number;
  title: string;
  description: string;
  category: string;
  imageUrl: string;
  link: string;
}

const Resources = () => {
  const [selectedCategory, setSelectedCategory] = useState<string>('all');

  const categories = [
    { id: 'all', name: 'All Resources' },
    { id: 'recycling', name: 'Recycling Points' },
    { id: 'education', name: 'Education Programs' },
    { id: 'alternatives', name: 'Eco-friendly Alternatives' },
    { id: 'community', name: 'Community Initiatives' },
  ];

  const resources: Resource[] = [
    {
      id: 1,
      title: 'Local Recycling Centers',
      description: 'Find nearby recycling centers and learn about what materials they accept.',
      category: 'recycling',
      imageUrl: 'https://images.unsplash.com/photo-1611284446314-60a58ac0deb9',
      link: '#',
    },
    {
      id: 2,
      title: 'Plastic-Free Living Workshop',
      description: 'Join our monthly workshop to learn practical tips for reducing plastic usage.',
      category: 'education',
      imageUrl: 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09',
      link: '#',
    },
    {
      id: 3,
      title: 'Sustainable Shopping Guide',
      description: 'Discover eco-friendly alternatives to common plastic products.',
      category: 'alternatives',
      imageUrl: 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5',
      link: '#',
    },
    {
      id: 4,
      title: 'Beach Cleanup Initiative',
      description: 'Join our monthly beach cleanup events and make a difference in your community.',
      category: 'community',
      imageUrl: 'https://images.unsplash.com/photo-1611709122769-f0129233080a',
      link: '#',
    },
  ];

  const filteredResources = selectedCategory === 'all'
    ? resources
    : resources.filter(resource => resource.category === selectedCategory);

  return (
    <div className="bg-gray-50 min-h-screen py-12">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center">
          <h1 className="text-3xl font-extrabold text-gray-900 sm:text-4xl">
            Resources for Plastic Reduction
          </h1>
          <p className="mt-4 text-lg text-gray-500">
            Discover tools, programs, and initiatives to help you reduce plastic waste.
          </p>
        </div>

        {/* Category Filter */}
        <div className="mt-8 flex flex-wrap justify-center gap-4">
          {categories.map((category) => (
            <button
              key={category.id}
              onClick={() => setSelectedCategory(category.id)}
              className={`px-4 py-2 rounded-full text-sm font-medium ${
                selectedCategory === category.id
                  ? 'bg-primary-600 text-white'
                  : 'bg-white text-gray-700 hover:bg-gray-50'
              }`}
            >
              {category.name}
            </button>
          ))}
        </div>

        {/* Resource Grid */}
        <div className="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
          {filteredResources.map((resource) => (
            <div
              key={resource.id}
              className="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
            >
              <div className="h-48 overflow-hidden">
                <img
                  src={resource.imageUrl}
                  alt={resource.title}
                  className="w-full h-full object-cover"
                />
              </div>
              <div className="p-6">
                <h3 className="text-lg font-medium text-gray-900">{resource.title}</h3>
                <p className="mt-2 text-gray-500">{resource.description}</p>
                <div className="mt-4">
                  <a
                    href={resource.link}
                    className="text-primary-600 hover:text-primary-500 font-medium"
                  >
                    Learn more →
                  </a>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default Resources; 