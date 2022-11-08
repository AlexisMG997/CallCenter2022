import React from "react";
import CustomizedTables from "../table/agentsTable";

const ContentWrapper = () => {
  return (
    <div className="flex flex-row min-w-full min-h-full">
      <div className="table w-4/5 m-5">
        <CustomizedTables></CustomizedTables>
      </div>
      <div className="data w-1/5 bg-slate-600 p-5 h-[calc(100vh-60px)]">
        <div className="flex-col bg-white h-1/3 mb-3">
            <div className="activeCallsBox">
                <div className=""></div>activeCallsContent
            </div>
        </div>
        <div className="flex-col bg-white h-1/3 mb-3">AAA</div>
        <div className="flex-col bg-white h-1/3">AAA</div>
      </div>
    </div>
  );
};

export default ContentWrapper;
