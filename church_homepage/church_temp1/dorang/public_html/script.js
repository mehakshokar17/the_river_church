const bibleDiv = document.querySelector('#bible');

fetch('https://bible-api.com/john%203:16')
  .then(response => response.json())
  .then(data => {
    const bibleVerse = `${data.bookname} ${data.chapter}:${data.verse} - ${data.text}`;
    bibleDiv.innerHTML = `<p>${bibleVerse}</p>`;
  })
  .catch(error => {
    console.error('Error fetching Bible:', error);
    bibleDiv.innerHTML = '<p>Error loading Bible.</p>';
  });
