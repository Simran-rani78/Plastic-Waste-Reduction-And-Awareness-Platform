import React from 'react';

const About = () => {
  const stats = [
    { id: 1, name: 'Active Users', value: '10,000+' },
    { id: 2, name: 'Recycling Centers', value: '500+' },
    { id: 3, name: 'Community Events', value: '200+' },
    { id: 4, name: 'Plastic Reduced', value: '50,000 kg' },
  ];

  const team = [
    {
      name: 'Sarah Johnson',
      role: 'Founder & CEO',
      imageUrl: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330',
      bio: 'Environmental activist with 10+ years of experience in sustainability.',
    },
    {
      name: 'Michael Chen',
      role: 'Head of Operations',
      imageUrl: 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5',
      bio: 'Expert in waste management and recycling technologies.',
    },
    {
      name: 'Emily Rodriguez',
      role: 'Community Manager',
      imageUrl: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80',
      bio: 'Passionate about building sustainable communities.',
    },
  ];

  return (
    <div className="bg-white">
      {/* Hero section */}
      <div className="relative bg-primary-600">
        <div className="max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
          <div className="text-center">
            <h1 className="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
              Our Mission
            </h1>
            <p className="mt-6 max-w-2xl mx-auto text-xl text-primary-100">
              We're dedicated to reducing plastic waste through education, community engagement,
              and sustainable solutions. Join us in creating a cleaner, greener future.
            </p>
          </div>
        </div>
      </div>

      {/* Stats section */}
      <div className="bg-gray-50 pt-12 sm:pt-16">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="max-w-4xl mx-auto text-center">
            <h2 className="text-3xl font-extrabold text-gray-900 sm:text-4xl">
              Making a Difference Together
            </h2>
            <p className="mt-3 text-xl text-gray-500 sm:mt-4">
              Our community's impact in numbers
            </p>
          </div>
        </div>
        <div className="mt-10 pb-12 bg-white sm:pb-16">
          <div className="relative">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div className="max-w-4xl mx-auto">
                <dl className="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-4">
                  {stats.map((stat) => (
                    <div key={stat.id} className="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                      <dt className="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                        {stat.name}
                      </dt>
                      <dd className="order-1 text-5xl font-extrabold text-primary-600">
                        {stat.value}
                      </dd>
                    </div>
                  ))}
                </dl>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* Team section */}
      <div className="bg-white py-12 sm:py-16 lg:py-20">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center">
            <h2 className="text-3xl font-extrabold text-gray-900 sm:text-4xl">
              Meet Our Team
            </h2>
            <p className="mt-4 text-lg text-gray-500">
              Passionate individuals working towards a sustainable future
            </p>
          </div>
          <div className="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            {team.map((person) => (
              <div key={person.name} className="bg-gray-50 rounded-lg overflow-hidden">
                <div className="h-48 overflow-hidden">
                  <img
                    className="w-full h-full object-cover"
                    src={person.imageUrl}
                    alt={person.name}
                  />
                </div>
                <div className="p-6">
                  <h3 className="text-lg font-medium text-gray-900">{person.name}</h3>
                  <p className="mt-1 text-sm text-primary-600">{person.role}</p>
                  <p className="mt-3 text-base text-gray-500">{person.bio}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>

      {/* Values section */}
      <div className="bg-gray-50 py-12 sm:py-16 lg:py-20">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center">
            <h2 className="text-3xl font-extrabold text-gray-900 sm:text-4xl">
              Our Values
            </h2>
            <p className="mt-4 text-lg text-gray-500">
              Core principles that guide our mission
            </p>
          </div>
          <div className="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <div className="bg-white rounded-lg shadow-lg p-6">
              <h3 className="text-lg font-medium text-gray-900">Sustainability</h3>
              <p className="mt-2 text-base text-gray-500">
                Promoting long-term environmental solutions that benefit both people and the planet.
              </p>
            </div>
            <div className="bg-white rounded-lg shadow-lg p-6">
              <h3 className="text-lg font-medium text-gray-900">Community</h3>
              <p className="mt-2 text-base text-gray-500">
                Building strong networks of individuals and organizations committed to positive change.
              </p>
            </div>
            <div className="bg-white rounded-lg shadow-lg p-6">
              <h3 className="text-lg font-medium text-gray-900">Innovation</h3>
              <p className="mt-2 text-base text-gray-500">
                Embracing new technologies and approaches to solve environmental challenges.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default About; 