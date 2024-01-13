const corpus = ["Don't count the days; make the days count.",
 "Be like water, my friend. Water can drip and it can crash. Be water, my friend.", 
 "You have power over your mind - not outside events. Realize this, and you will find strength.",
"Flow with the rhythm of life, adapt with its pace. Your resilience is your strength, as enduring as the ceaseless waves against the shore"];

function getRandomWord() {
  const randomIndex = generateRandomNumber(corpus.length)
  
  return corpus[randomIndex];
}

function generateRandomNumber(length) {
  
  return Math.floor(Math.random() * length);
}






