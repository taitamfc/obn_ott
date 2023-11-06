import React, { useState } from "react";

function Textarea() {
  const [state, setState] = useState({
    description: "The content of a textarea goes in the value attribute"
  });
  return (
    <form>
      <textarea value={state.description} />
    </form>
  );
}

export default Textarea;