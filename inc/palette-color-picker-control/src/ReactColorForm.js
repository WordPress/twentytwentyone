/* globals _, wp, React */
import { TwitterPicker } from 'react-color';
import reactCSS from 'reactcss';

const ReactColorForm = ( props ) => {

	const handleChangeComplete = ( color ) => {
		wp.customize.control( props.customizerSetting.id ).setting.set( color.hex );
	};

	const styles = reactCSS({
		'default': {
			details: {
				border: '1px solid rgba(0,0,0,.2)',
				padding: '5px',
				borderRadius: '5px'
			},

			summary: {
				display: 'flex',
				alignItems: 'center',
			},

			summaryColor: {
				background: props.value,
				display: 'block',
				width: '40px',
				height: '2em',
				borderRadius: '4px',
				border: '1px solid rgba(0,0,0,.2)',
			},

			summaryText: {
				color: '#a0a0a0',
				padding: '0 12px',
				fontFamily: 'Menlo, Consolas, monaco, monospace'
			},

			wrapper: {
				marginTop: '12px'
			}
		},
	});

	let controlLabel = <label className="customize-control-title">{ props.label }</label>;
	let controlDescription = <span className="description customize-control-description" dangerouslySetInnerHTML={{ __html: props.description }}></span>;
	let controlNotifications = <div className="customize-control-notifications-container" ref={ props.setNotificationContainer }></div>;
	let summary = <summary style={ styles.summary }><span style={ styles.summaryColor }></span><span style={ styles.summaryText }>{ props.value }</span></summary>
	let isSummaryDefaultOpen = ( true === props.choices.summaryOpen ) ? 'open="true"' : '';

	return (
		<div style={ styles.wrapper }>
			{ controlLabel }{ controlDescription }{ controlNotifications }
			<details style={ styles.details } className="colorPickerContainer" { ...isSummaryDefaultOpen }>
				{ summary }
				<TwitterPicker
					width="300"
					{ ...props.choices }
					color={ props.value }
					onChangeComplete={ handleChangeComplete }
				/>
			</details>
		</div>
	);
};

export default ReactColorForm;
