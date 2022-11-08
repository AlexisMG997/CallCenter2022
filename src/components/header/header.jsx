import React from "react";

const Header = () => {
  return (
    <div className="contentHeader flex flex-row w-[100%] h-30">
      <div className="headerLogo bg-black w-3/4 h-14 text-white font-medium text-2xl">
        <p className="mt-4 ml-3">Call Center</p>
      </div>
      <div className="headerButtons flex bg-black w-1/4 text-center">
        <button className="buttonStart w-1/2 m-2 bg-green-400">Start</button>
        <button className="buttonEnd w-1/2 m-2 bg-red-500">Stop</button>
      </div>
    </div>
  );
};

export default Header;
