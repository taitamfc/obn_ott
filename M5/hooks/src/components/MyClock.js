import useClock from './hooks/useClock';

function MyClock(props) {
    const [time, ampm] = useClock();
    return (
        <div id="clock-style">
            {time}
            <span> {ampm} </span>
        </div>
    );
}

export default MyClock;