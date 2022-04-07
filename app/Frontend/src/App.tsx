import 'bootstrap/dist/css/bootstrap.min.css'
import ArticleCard from './components/ArticleCard'
import ArticleForm from './components/ArticleForm';
import React from "react"

function App() {

  const [cards, setCards] = React.useState([
    {
        id: 1,
        title: "The title",
        content: "The content..."
    },
    {
      id: 2,
      title: "The other title",
      content: "The other content..."
  }
])

  return (
    <div className="App">
        <ArticleForm />
        {cards.map((card) => {
          <ArticleCard key={card.id} title={card.title} content={card.content} />
        })}
    </div>
  );
}

export default App;
