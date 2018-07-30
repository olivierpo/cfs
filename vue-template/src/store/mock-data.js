function hours(a) {
  const d = new Date();
  d.setHours(0, 0, 0, 0);
  return new Date(d.getTime() + (a * 1000 * 3600));
}

function randInt(min, max) {
  return Math.floor(Math.random() * ((max - min) + 1)) + min;
}

function randomInterval(a, b, c, d) {
  return {
    startTime: hours(randInt(a, b)),
    endTime: hours(randInt(c, d)),
  };
}

function makeRoom(name) {
  return {
    name,
    events: [
      {
        ...randomInterval(9, 12, 13, 14),
        content: 'Event',
      },
      {
        ...randomInterval(15, 16, 17, 18),
        content: 'Event',
      },
    ],
  };
}


function makeFacility(name) {
  return {
    [name]: {
      rooms: [
        makeRoom('Room 1'),
        makeRoom('Room 2'),
        makeRoom('Room 3'),
      ],
    },
  };
}

function makeMockData() {
  return {
    facilities: {
      ...makeFacility('Cool Facility'),
      ...makeFacility('Coolest Facility'),
      ...makeFacility('Air-Conditioned Facility'),
    },
    facilityList: ['Cool Facility', 'Coolest Facility', 'Air-Conditioned Facility'],
  };
}

export default makeMockData;

