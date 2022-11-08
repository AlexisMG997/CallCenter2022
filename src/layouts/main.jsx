import {
  BrowserRouter,
  HashRouter,
  Routes,
  Router,
  Route,
} from "react-router-dom";
import simulator from "../components/simulator/simulator";
import Header from "../components/header/header";
import ContentWrapper from "../components/contentWrapper/contentWrapper";

function Main() {
  return (
    <div>
      <Header></Header>
      <ContentWrapper></ContentWrapper>
    </div>
  );
}

export default Main;
